<style>
    .item{
        border-color: #ddd;
        border-image: none;
        border-style: solid none solid solid;
        border-width: 1px medium 1px 1px;
        color: #333 !important;
        display: inline-block;
        font-weight: 400;
        margin: 0;
        padding: 5px 12px;
        position: relative;
        background-color: transparent;
        line-height: 22px;
        font-size: 14px;
    }
    .pagination{
        margin: 20px auto;
    }
    .pagination>li>a{
        background: #ffffff;
        color: #333333;
        transition: 0.3s;
    }

    .pagination>li>a:hover{
        background: #e64d4f;
        color: #ffffff;
    }

    .pagination>.active>a{
        color: #fff;
        cursor: default;
        background-color: #e64d4f;
        border-color: #e64d4f   ;
    }
    .pagination>.active>a:hover{
        background: #e64d4f;
        color: #ffffff;
    }
</style>

@if (isset($paginator) && $paginator->lastPage() > 1)

    <ul class="pagination">

    <?php
    $interval = isset($interval) ? abs(intval($interval)) : 3 ;
    $from = $paginator->currentPage() - $interval;
    if($from <=0){
        $from = 1;
    }

    $to = $paginator->currentPage() + $interval;
    if($to > $paginator->lastPage()){
        $to = $paginator->lastPage();
    }
    ?>
        <li><span class="item" style="background: #ffffff; color: #333333; cursor: text">Pages</span></li>
    <!-- first/previous -->
        @if($paginator->currentPage() > 1)
            <li>
                <a class="item item-page" href="{{ $paginator->url(1) }}" aria-label="First">
                    <span  aria-hidden="true">First</span>
                </a>
            </li>

            <li>
                <a class="item item-page" href="{{ $paginator->url($paginator->currentPage() - 1) }}" aria-label="Previous">
                    <span  aria-hidden="true">«</span>
                </a>
            </li>
        @endif

    <!-- links -->
        @for($i = $from; $i <= $to; $i++)
            <?php
            $isCurrentPage = $paginator->currentPage() == $i;
            ?>
            <li class="{{ $isCurrentPage ? 'active' : '' }}">
                <a class="item" href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}">
                    {{ $i }}
                </a>
            </li>
        @endfor

    <!-- next/last -->
        @if($paginator->currentPage() < $paginator->lastPage())
            <li>
                <a class="item" href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>

            <li>
                <a class="item" href="{{ $paginator->url($paginator->lastpage()) }}" aria-label="Last">
                    <span aria-hidden="true">Last</span>
                </a>
            </li>
        @endif

    </ul>

@endif
