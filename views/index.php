%% views/header.html %%

<div class="row">
  <div class="col-lg-12">

      <form action="@@todo/add@@" method="post">
      <div class="form-group">
        <label for="description">Add a new todo.</label>
        <input type="text" min="1" id="description" name="description" class="form-control" placeholder="Enter description" value=""/>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <h2>Current To Do:</h2>
      
    <table class="table table-striped" frame="box">
      <thead class="thead-dark">
        <tr>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
[[ foreach ($todos as $todo) : ]]
        <tr>
          <td class="align-middle"><?php echo "{$todo['description']}" ?></td>
          <td>
            <div class="btn-toolbar align-middle float-right">
              <button class="btn btn-success d-flex justify-content-center align-content-between mr-1" onclick="post('@@todo/done/{{$todo['id']}}@@')"><span class="material-icons">done</span></button>
              <button class="btn btn-primary d-flex justify-content-center align-content-between mr-1" onclick="get('@@todo/edit/{{$todo['id']}}@@')"><span class="material-icons">create</span></button>
              <button class="btn btn-danger d-flex justify-content-center align-content-between" onclick="post('@@todo/delete/{{$todo['id']}}@@')"><span class="material-icons">delete</span></button>
            </div>
          </td>
        </tr>
[[ endforeach; ]]
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <h2>Past To Do:</h2>
    <table class="table table-striped" frame="box">
      <thead class="thead-dark">
        <tr>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
[[ foreach ($dones as $todo) : ]]
        <tr>
          <td class="align-middle"><?php echo "{$todo['description']}" ?></td>
          <td>
            <div class="btn-toolbar align-middle float-right">
              <button class="btn btn-success d-flex justify-content-center align-content-between mr-1" onclick="post('@@todo/done/{{$todo['id']}}@@')"><span class="material-icons">block</span></button>
              <button class="btn btn-primary d-flex justify-content-center align-content-between mr-1" onclick="get('@@todo/edit/{{$todo['id']}}@@')"><span class="material-icons">mode_edit</span></button>
              <button class="btn btn-danger d-flex justify-content-center align-content-between" onclick="post('@@todo/delete/{{$todo['id']}}@@')"><span class="material-icons">delete</span></button>
            </div>
          </td>
        </tr>
[[ endforeach; ]]
      </tbody>
    </table>
  </div>
</div>
          
%% views/footer.html %% 