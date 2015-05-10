<aside class="col-xs-12 col-md-6 col-lg-4">
    <ul>
        <li><h3>Last Posts</h3></li>
        <div id="last_posts"></div>
        <li><h3>Search By Tag</h3></li>
        <li><h3>Popular Tags</h3></li>
    </ul>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        $( document ).ready(function() {
//        $('#show_last_posts').on('click', function(ev) {
            $.ajax({
                url: '/posts/getLastPosts',
                method: 'GET'
            }).success (function(data){
                $('#last_posts').html(data);
            })
        })
    </script>
</aside>