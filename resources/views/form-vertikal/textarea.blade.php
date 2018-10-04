@isset($array)

<div class="form-group">
  <label for="{{ $id }}">{{ $label }}</label>
    <textarea name="{{ $id }}[]" type="text" class="form-control" id="{{ $id }}" placeholder="{{ $label }}">{{ old($id) ? (is_array(old($id)) ? old($id)[$index] : old($id)) : (isset($value) ? $value : '') }}</textarea>
</div>

@else

<div class="form-group">
  <label for="{{ $id }}">{{ $label }}</label>
    <textarea name="{{ $id }}" type="text" class="form-control" id="{{ $id }}" placeholder="{{ $label }}">{{ old($id) ? old($id) : (isset($value) ? $value : '') }}</textarea>
</div>

@endisset