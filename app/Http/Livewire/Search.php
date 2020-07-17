<?php


namespace App\Http\Livewire;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

abstract class Search extends Component
{
    use WithPagination;

    public $searchInput;
    public $oldSearchInput;
    public $perPage = 5;

    public $url;
    public $itemName;
    public $searchField;
    public $fields;

    abstract protected function setUrl();
    abstract protected function setItemName();
    abstract protected function setSearchField();
    abstract protected function setFields();


    public function mount()
    {
        $this->searchInput = '';
        $this->setUrl();
        $this->setItemName();
        $this->setSearchField();
        $this->setFields();
    }

    public function render()
    {
        $items = $this->searchAction($this->searchInput);
        $this->oldSearchInput = $this->searchInput;
        $sliceItems = $items->slice(($this->page - 1) * $this->perPage, $this->perPage);

        return new LengthAwarePaginator($sliceItems,count($items), 5, $this->page);
    }

    protected function searchAction(string $search)
    {
        $response = Http::get($this->url);
        $models = $response->json()[$this->itemName];
        $modelsCollection = collect($models);
        if ($search) {
            $searchField = $this->searchField;
            $modelsCollection = $modelsCollection->filter(function ($item) use ($search, $searchField) {
                return false !== stristr($item[$searchField], $search);
            });
        }

        $fields = $this->fields;
        $modelsCollection->transform(function ($item) use ($fields) {
            foreach ($fields as $field) {
                $modelFields[$field] = $item[$field] ?? null;
            }

            return $modelFields ?? [];
        });

        return $modelsCollection;
    }
}
