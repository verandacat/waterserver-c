function myFavorite () {
    var bookmarkURL = window.location.href;
    var bookmarkTitle = document.title;

    if (document.all)  {
        window.external.AddFavorite(bookmarkURL,bookmarkTitle);
    }else if (window.sidebar&&window.sidebar.addPanel) {
        window.sidebar.addPanel(bookmarkTitle,bookmarkURL,"");
    }else{
        alert("このお気に入り追加ボタンは、Google Chrome/Safari等には対応しておりません。");
    }
}