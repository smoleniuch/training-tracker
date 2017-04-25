<ul class="list-group user-list">

  @foreach($rowDatas as $rowData)

    @include($row,$rowData)

  @endforeach

</ul>
