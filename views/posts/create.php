<article class="col-xs-12 col-md-12 col-lg-12 post-short">
    <form method="post" action="/posts/create">
        <div class="main-part">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <label for="title">Post Title: </label>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-8">
                    <input type="text" name="title" class="inputs"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <label for="content">Post Content: </label>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-8">
                    <textarea name="content" id="" cols="30" rows="10" class="inputs"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <label for="tags">Tags: </label>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-8">
                    <input type="text" name="tags" class="inputs"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <button type="submit" class="btn-default">Create Post</button>
            </div>
        </div>
    </form>

    <div class="col-xs-12 col-md-12 col-lg-12">
        <form class="form-buttons" action="/posts">
            <button type="submit" class="btn-default">Cancel</button>
        </form>
    </div>
</article>