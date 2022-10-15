@extends('layouts.template')
@section('page-title', 'Home page')
@section('style-file')
    <link rel="stylesheet" href="/assets/css/{{ app()->getlocale() }}/web/homepage.css">
@endsection
@section('page-header')
    home page
@endsection
@section('page-content')
    <input id="bookauthorname" list="authors" name="browser" />
    <datalist id="authors">
        <option value="1">Internet Explorer</option>
        <option value="2">Firefox</option>
        <option value="3">Chrome</option>
        <option value="4">Opera</option>
        <option value="5">Safari</option>
    </datalist>
    <button id="btnShowResult">Mostrar resultado</button>
    <br />
    <span id="spnResult"></span>
@endsection
