@csrf
<div>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ isset($model)? $model->title : '' }}" />
</div>
<div>
    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="{{ isset($model)? $model->slug : '' }}" />
</div>
<div>
    <label for="published_at">Published Date/Time</label>
    <input type="text" id="published_at" name="published_at" value="{{ isset($model)? $model->published_at : '' }}" />
</div>
<div>
    <label for="body">Body</label>
    <textarea cols="30" rows="10" id="body" name="body">{{ isset($model)? $model->body : '' }}</textarea>
</div>
<div>
    <label for="excerpt">Excerpt</label>
    <textarea cols="30" rows="10"id="excerpt" name="excerpt">{{ isset($model)? $model->excerpt : '' }}</textarea>
</div>

<div>
    <input type="submit" value="Submit" />
</div>