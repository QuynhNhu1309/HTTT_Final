<style>
.error_msg {
    text-align: left;
    color: red;
    font-weight: bold;
    padding: 20px 5px 20px 60px;
    border: 1px dotted #ccc;
    background: #f7f7f7 url("../images/warning.png") no-repeat 15px center;
    /** Thêm CSS 3.0 **/
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
}
</style>

@if (count($errors) > 0)
    
        <ul class="error_msg">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    
@endif
