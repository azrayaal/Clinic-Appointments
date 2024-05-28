<table id="example2" class="table table-bordered table-hover table-striped" style="width: 100%">
  <thead>
    <tr>
      <th style="width: 7%">No</th>
      <th style="width: 20%">Name</th>
      <th>Specialization</th>
    </tr>
  </thead>
  <tbody>
    
        @foreach($doctor as $index => $doctor)
        <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $doctor->name }}</td>
        <td>{{ $doctor->specialization }}</td>

        </tr>
        @endforeach
  </tbody>
</table>