<aside class="col-xs-12 col-md-6 col-lg-4">
    <ul>
        <li><h3>Last Posts</h3></li>
        <div id="last_posts"></div>
        <li><h3>Popular Tags</h3></li>
        <div id="popular_tags"></div>
<!--        <li><h3>Search By Tag</h3></li>-->
    </ul>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        $( document ).ready(function() {
            $.ajax({
                url: '/posts/getLastPosts',
                method: 'GET'
            }).success (function(data){
                $('#last_posts').html(data);
            })
        })

        $( document ).ready(function() {
            $.ajax({
                url: '/tags/findPopularTags',
                method: 'GET'
            }).success (function(data){
                $('#popular_tags').html(data);
            })
        })
    </script>
</aside>