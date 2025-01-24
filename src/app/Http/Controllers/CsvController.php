<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Requests\CsvRequest;
use App\Models\Area;
use App\Models\Genre;
use SplFileObject;


class CsvController extends Controller
{
    public function csvView(Request $request)
    {
        $representative_id = $request->representative_id;
        return view('representative.representative_csv', compact('representative_id'));
    }

    public function create(CsvRequest $request)
    {
        $file_path = $request->file('csvFile')->path();

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

        // 登録処理
        $count = 0;
        foreach ($file as $row => $line) {
            // ヘッダーを取得
            if (empty($header)) {
                $header = $line;
                continue;
            }
            for ($a_id = 0; $a_id < $areaCount; $a_id++) {
                if ($line[1] == $area[$a_id]['area']) {
                    $line[1] = $area[$a_id]['id'];
                }
            }
            for ($g_id = 0; $g_id < $genreCount; $g_id++) {
                if ($line[2] == $genre[$g_id]['genre']) {
                    $line[2] = $genre[$g_id]['id'];
                }
            }
            Shop::insert(['representative_id' => $request->representative_id, 'name' => $line[0], 'areas' => $line[1], 'genres' => $line[2], 'overview' => $line[3], 'image' => $line[4]]);
            $count++;
        }
        return redirect(route('representative.csv', [
            'representative_id' => $request->representative_id,
        ]))->with('flash_message', $count . '個の店舗を登録しました！');
    }
}
