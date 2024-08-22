<x-layouts.admin.layout>
    <x-admin.container.header title="Articles" name="articles" model="create-article-model"/>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"admin.Articles</h3>
                        </div>
                        <div class="card-table table-responsive">
                            <x-admin.tables.articles :articles="$articles" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-admin.model.create-article />

</x-layouts.admin.layout>
