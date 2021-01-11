<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    {{$slot}} 
    @if(session()->has('message'))
        <div class="alert alert-success">{{session()->get('message')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif
</div>