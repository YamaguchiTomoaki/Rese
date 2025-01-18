window.onload = function () {
    // 画像添付処理
    const uploadBox = document.querySelector(".image__image");
    const previewBox = document.querySelector(".image__image img");
    const fileInput = document.getElementById("image");

    function roadImg(e) {
        console.log(uploadBox);

        const file = e.target.files[0];  // inputのvalueを取得
        if (!file) return;  // 何も選択されなければreturn
        previewBox.removeAttribute("hidden");
        previewBox.src = URL.createObjectURL(file);  // fileのurlをsrcに指定
        console.log(document.getElementById("span"));
        document.querySelector(".first__line").hidden = true;
        document.querySelector(".second__line").hidden = true;
    }

    // inputのvalueが変更された時の処理
    fileInput.addEventListener("change", roadImg, false);
    // uploadBoxをクリックすると、inputがクリックされたことになる
    uploadBox.addEventListener("click", () => fileInput.click());

    function dragover(e) { // ドラッグした時に背景色を変える
        e.stopPropagation();
        e.preventDefault();
        this.style.background = "#e1e7f0";
    }

    function dragleave(e) {  // ドラッグがエリアから離れたら背景色を元に戻す
        e.stopPropagation();
        e.preventDefault();
        this.style.background = "#fff";
    }

    function dropLoad(e) {
        e.stopPropagation();
        e.preventDefault();

        uploadBox.style.background = "#fff"; //背景色を白に戻す
        let files = e.dataTransfer.files; //ドロップしたファイルを取得
        if (files.length > 1)
            return alert("アップロードできるファイルは1つだけです。");
        fileInput.files = files; // inputのvalueをドロップしたファイルに置き換える
        previewBox.removeAttribute("hidden");
        previewBox.src = URL.createObjectURL(fileInput.files[0]); // fileのurlをsrcに指定
        document.querySelector(".first__line").hidden = true;
        document.querySelector(".second__line").hidden = true;
    }

    // ファイルがドロップされた時の処理
    uploadBox.addEventListener("drop", dropLoad, false);
    // ドラッグした時の処理
    uploadBox.addEventListener("dragover", dragover, false);
    // ドラッグがエリアから離れた時の処理
    uploadBox.addEventListener("dragleave", dragleave, false);


    // コメント文字数カウント表示処理
    const textare = document.querySelector('.comment');
    const comment__count = document.querySelector('.comment__count');

    textare.addEventListener('keyup', onKeyUp);

    function onKeyUp() {
        var inputText = textare.value;
        comment__count.innerText = inputText.length;
    }
}

