@if(isset($updateData))
    <form action="{{ route('updatedata', ["id" => $updateData->id]) }}" method="post" style="text-align:center;">
        @csrf
        @method('PUT')
        name:<input type="text" name="name" value="{{$updateData->name}}"><br>
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>
        email:<input type="text" name="email" value="{{$updateData->email}}"><br>
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>
        phone:<input type="text" name="phone" value="{{$updateData->phone}}"><br>
        @error('phone')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>
        <input type="submit" value="update">
    </form>
    @else
    <form action="inputdata" method="post" style="text-align:center;">
        @csrf
        name:<input type="text" name="name" value="{{ old('name') }}"><br>
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>
        email:<input type="text" name="email" value="{{ old('email') }}"><br>
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>
        phone:<input type="text" name="phone" value="{{ old('phone') }}"><br>
        @error('phone')
            <span class="text-danger">{{$message}}</span>
        @enderror<br>
        <input type="submit" value="submit">
    </form>
    @endif