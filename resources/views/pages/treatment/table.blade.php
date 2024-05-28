<table id="example2" class="table table-bordered table-hover table-striped" style="width: 100%">
  <thead>
    <tr>
      <th style="width: 7%">No</th>
      <th style="width: 20%">Name</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    
        @foreach($treatment as $index => $treatment)
        <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $treatment->name }}</td>
        <td>{{ $treatment->description }}</td>

        </tr>
        @endforeach
  </tbody>
</table>