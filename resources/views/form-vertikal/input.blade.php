<div class="form-group">
	<label for="{{ $id }}">{{ $label }}</label>
	<input @isset($readonly) readonly="readonly" @endisset name="{{ isset($name) ? $name : $id }}" type="text" class="form-control" id="{{ $id }}" placeholder="{{ $label }}" value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}">
</div>