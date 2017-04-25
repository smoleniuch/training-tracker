<h4 class="text-center"><strong>Groups</strong></h4>
<div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Add <span class="glyphicon glyphicon-plus"></span></button>
      </span>
      <input type="text" class="form-control" placeholder="">
    </div>
    <br>
<ul class="list-group">

@if(!empty($groups))

  @foreach($groups as $group)


    <li class="list-group-item" >
      <span class="glyphicon glyphicon-remove text-right"></span>
      <span class="glyphicon glyphicon-pencil"></span>
      <span class="group-name" contenteditable="true">{{$group->name}}</span>
      <span class="glyphicon glyphicon-ok hidden"></span>
      </li>

  @endforeach




    <li class="list-group-item" contenteditable="true">

      Asdaaa
     </li>


@endif

</ul>
