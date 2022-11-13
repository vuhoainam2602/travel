<div class="pagination text-center">
    <?php
    $from = $number -3;
    if ($from <= 0) {
        $from = 1;
    }

    $to = $number + 3;
    if ($to > $max_page) {
        $to = $max_page;
    }
    ?>

    @if($number !=0)
        <a class="item item-page" href="/{{ $list_post_lien_quan[0]->user_login}}/page/1"
           aria-label="First">
            <span aria-hidden="true">First</span>
        </a>
    @endif
    @if($prevUrl)
        <a class="btn btn-info leftbtn"
           href="/{{$list_post_lien_quan[0]->user_login}}/page/{{$prevUrl}}">«</a>
    @endif
    @for($i = $from; $i <= $to; $i++)
        <a class="btn btn-info rightbtn"
           href="/{{$list_post_lien_quan[0]->user_login}}/page/{{$i}}">{{$i}}</a>
    @endfor

    @if($nextUrl)
        <a class="btn btn-info rightbtn"
           href="/{{$list_post_lien_quan[0]->user_login}}/page/{{$nextUrl}}">»</a>
    @endif
    @if($number != $max_page)
        <a class="item item-page"
           href="/{{ $list_post_lien_quan[0]->user_login}}/page/{{$max_page}}"
           aria-label="Last">
            <span aria-hidden="true">Last</span>
        </a>
    @endif
</div>
