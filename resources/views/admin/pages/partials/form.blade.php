@csrf
<div>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ isset($model)? $model->title : '' }}" />
</div>
<div>
    <label for="url">URL</label>
    <input type="text" id="url" name="url" value="{{ isset($model)? $model->url : '' }}" />
</div>
<div>
    <label for="content">Content</label>
    <input type="text" id="content" name="content" value="{{ isset($model)? $model->content : '' }}" />
</div>
<div>
    <input type="submit" value="Submit" />
</div>