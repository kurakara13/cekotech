<div class="form-group">
  <label for="{{ $id }}" class="col-lg-2 control-label">{{ $label }}</label>
  <div class="col-sm-6">
    <input @isset($readonly) readonly="readonly" @endisset name="{{ isset($name) ? $name : $id }}" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" class="form-control" id="{{ $id }}" placeholder="{{ $label }}" value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}">
    @if(isset($hint)) <small><span class="text-muted">{{ $hint }}</span></small> @endif
  </div>
</div>