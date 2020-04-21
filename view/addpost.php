<div class="container">
    <div class="py-5 text-center">
        <h2>Добавление статьи</h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="needs-validation" action="/publish" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="postName">Заголовок</label>
                        <input type="text" class="form-control" id="postName" placeholder="Введите название статьи" name="title">
                        <div class="invalid-feedback">
                            Заголовок статьи обязателен!
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="inputArea">Текст</label>
                        <textarea id="inputArea" rows="25" name="body"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="inputArea">Добавление пиктограммы к статье</label>
                            <input type="file" class="form-control-file" id="picUpload" name="picUpload" accept=".jpeg,.jpg,.png,.bmp,.gif">
                        </div>
                    </div>
                </div>
                <hr class="mb-3">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Сохранить</button>
            </form>
        </div>
    </div>
</div>