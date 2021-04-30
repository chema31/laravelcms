@csrf
<div>
    <label for="title">Title</label>
    <input
            type="text"
            id="title"
            name="title"
            value="{{ isset($model)? $model->title : '' }}"
            class="px-4 py-3 rounded-full"
    />
</div>
<div>
    <label for="slug">Slug</label>
    <input
            type="text"
            id="slug"
            name="slug"
            value="{{ isset($model)? $model->slug : '' }}"
            class="px-4 py-3 rounded-full"
    />
</div>
<div>
    <label for="published_at">Published Date/Time</label>
    <t-datepicker name="published_at" id="published_at" value="{{ isset($model)? $model->published_at : date('Y-m-d H:i:s') }}" />
</div>
<div>
    <label for="body">Body</label>
    <ckeditor
            tag-name="textarea"
            type="inline"
            id="body"
            name="body"
            value="{{ isset($model)? $model->body : '' }}"
    ></ckeditor>
</div>
<div>
    <label for="excerpt">Excerpt</label>
    <textarea
            cols="30"
            rows="10"
            id="excerpt"
            name="excerpt"
            class="px-4 py-3 rounded"
    >{{ isset($model)? $model->excerpt : '' }}</textarea>
</div>

<div>
    <input
            type="submit"
            value="Submit"
            class="px-4 py-3 rounded-full"
    />
</div>