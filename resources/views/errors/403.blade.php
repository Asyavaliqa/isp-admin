@extends('errors.layout')

@section('pageTitle', 'Forbidden')
@section('code', '403')
@section('title', 'Forbidden')
@section('message', $exception->getMessage() ?: 'Forbidden')
