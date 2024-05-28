<table id="example2" class="table table-bordered table-hover table-striped" style="width: 100%">
  <thead>
    <tr>
      <th style="width: 7%">No</th>
      <th style="width: 20%">Date</th>
      <th>Doctor</th>
      <th>Treatment</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($userAppointments as $index => $appointment)
    <tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $appointment->date }}</td>
    <td>{{ $appointment->doctor->name }}</td>
    <td>{{ $appointment->treatment->name }}</td>
    <td style="text-align: center">
      <form action="/appointment/delete/{{ $appointment->id }}" method="POST" style="display: inline-block">
      <!-- <a href="/appointment/edit/{{ $appointment->_id }}" class="btn btn-warning">
    <i class="fas fa-pencil-alt"></i>
    Change Date
    </a> -->
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash-alt"></i>
        Cancel
      </button>

      </form>
    </td>
    </tr>
  @endforeach
  </tbody>
</table>