<form method="post">
    <input type="text" name="username">
    <input type="text" name="password">
    <input type="text" value="{{csrf_token()}}" name="_token" hidden>
    <input type="submit" value="submit">
</form>