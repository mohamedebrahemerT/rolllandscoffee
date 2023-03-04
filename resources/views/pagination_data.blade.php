                                          @foreach($data as $row)
      <tr>
       <td>{{ $row->ID}}</td>
       <td>{{ $row->Title }}</td>
       <td>{{ $row->Description }}</td>
      </tr>
      @endforeach
      <tr>
       <td colspan="3" align="center">
        {!! $data->links() !!}
       </td>
      </tr>
