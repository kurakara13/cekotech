<div class="form-group">
  <label for="{{ $id }}" class="col-lg-4 control-label">{{ $label }}</label>
  <div class="col-sm-7">
    <input readonly="readonly" name="{{ isset($name) ? $name : $id }}" type="text" class="form-control" id="{{ $id }}" placeholder="{{ $label }}" value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}">
  </div>
</div>