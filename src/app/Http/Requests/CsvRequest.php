<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use SplFileObject;
use App\Models\Area;
use App\Models\Genre;

class CsvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'csvFile' => 'required | file | mimes:csv,txt',
            'csv_array' => 'required | array',
            'csv_array.*.name' => 'required | string | max:50',
            'csv_array.*.areas' => 'required',
            'csv_array.*.genres' => 'required',
            'csv_array.*.overview' => 'required | string | max:400',
            'csv_array.*.image' => 'required | string | max:255',
        ];
    }

    public function messages()
    {
        return [
            'csvFile.required' => '店舗情報のcsvファイルを添付してください',
            'csvFile.max' => '100MBを超えるファイルは添付できません',
            'csvFile.mimes' => '指定外のファイルは添付できません',
            'csv_array.*.name.required' => '店舗名が未設定の行があります',
            'csv_array.*.name.string' => '店舗名を文字列で入力してください',
            'csv_array.*.name.max' => '店舗名が50文字を超える行があります',
            'csv_array.*.areas.required' => '未設定の地域が入力されている又は入力されていない行があります',
            'csv_array.*.genres.required' => '未設定のジャンルが入力されている又は入力されていない行があります',
            'csv_array.*.overview.required' => '店舗概要が未設定の行があります',
            'csv_array.*.overview.string' => '店舗概要を文字列で入力してください',
            'csv_array.*.overview.max' => '店舗概要が400文字を超える行があります',
            'csv_array.*.image.required' => '店舗画像URLが未設定の拡張子で入力されている又は未設定の行があります',
            'csv_array.*.image.string' => '店舗画像URLを文字列で入力してください',
            'csv_array.*.image.max' => '店舗画像URLが255文字を超える行があります',
        ];
    }

    protected function prepareForValidation()
    {
        // csvファイルが無い場合にエラーになる為
        if ($this->file('csvFile') != null) {
            $file_path = $this->file('csvFile')->path();

            $fileData = file_get_contents($file_path);
            $fileData = preg_replace("/\r\n|\r/", "\n", $fileData); // 読込み行ごとの改行パターンを置換
            $encode = mb_detect_encoding($fileData, ['SJIS-win', 'UTF-8']); // 文字コード判定
            if ($encode == 'SJIS-win') {
                $fileData = mb_convert_encoding($fileData, 'UTF-8', 'SJIS-win'); // 区別してエンコード
            }

            $tmpName = tempnam(sys_get_temp_dir(), "csv");
            file_put_contents($tmpName, $fileData); // $tmpNameにファイルデータを詰めてからSplFileObjectで読込む

            // CSV取得
            $file = new SplFileObject($tmpName);
            $file->setFlags(
                SplFileObject::READ_CSV |         // CSVとして行を読み込み
                    SplFileObject::READ_AHEAD |       // 先読み／巻き戻しで読み込み
                    SplFileObject::SKIP_EMPTY |       // 空行を読み飛ばす
                    SplFileObject::DROP_NEW_LINE      // 行末の改行を読み飛ばす
            );

            // ares,genres変換
            $area = Area::all();
            $areaCount = count($area);
            $genre = Genre::all();
            $genreCount = count($genre);


            foreach ($file as $index => $line) {
                // ヘッダーを取得
                if (empty($header)) {
                    $header = $line;
                    continue;
                }
                $csv_array[$index]['name'] = $line[0];
                for ($a_id = 0; $a_id < $areaCount; $a_id++) {
                    if ($line[1] == $area[$a_id]['area']) {
                        $line[1] = $area[$a_id]['id'];
                        $csv_array[$index]['areas'] = $line[1];
                        break;
                    }
                }
                for ($g_id = 0; $g_id < $genreCount; $g_id++) {
                    if ($line[2] == $genre[$g_id]['genre']) {
                        $line[2] = $genre[$g_id]['id'];
                        $csv_array[$index]['genres'] = $line[2];
                        break;
                    }
                }
                $csv_array[$index]['overview'] = $line[3];
                // .jpgか.pngの場合のみ保存可能にする
                $check = substr($line[4], strrpos($line[4], '.'));
                if ($check == ".jpg" || $check == ".png") {
                    $csv_array[$index]['image'] = $line[4];
                } else {
                    $csv_array[$index]['image'] = null;
                }
            }
            $this->merge([
                'csv_array' => $csv_array,     //requestに項目追加
            ]);
        }
    }
}
