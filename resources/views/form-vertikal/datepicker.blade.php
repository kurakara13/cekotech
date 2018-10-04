<div class="form-group">
  <label for="{{ $id }}">{{ $label }}</label>
    <input data-toggle="datepicker" name="{{ isset($name) ? $name : $id }}" type="text" class="form-control" id="{{ $id }}" placeholder="{{ $label }}" value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}" @isset($required) required="required" @endisset>
  </div>