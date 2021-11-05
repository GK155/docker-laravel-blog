<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $category)
    {
        $this->categoryRepository = $category;
    }

    public function index()
    {
        return view('categories', [
            'categories' => $this->categoryRepository->all()
        ]);
    }

    public function show(Request $request)
    {
        return view('posts', [
            'posts' => $this->categoryRepository->posts($request->slug)
        ]);
    }

    public function edit(Request $request)
    {
        $category = app(CategoryRepository::class)->findBySlug($request->slug);

        return view('edit-category', [
            'category' => $category
        ]);
    }

    public function update(EditCategoryRequest $request)
    {
        $data = $request->validated();

        try {

            $this->categoryRepository->update($data);
            return redirect('/categories')->with('updated', 'Category updated!');

        } catch (\Exception $e) {

            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }
    }

    public function create(CreateCategoryRequest $request)
    {
        $data = $request->validated();

        try {

            $this->categoryRepository->create($data);
            return back()->with('success', 'New category ' . $data['title'] . ' added');;

        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }

    }

    public function delete($slug)
    {
        try {

            if(count($this->categoryRepository->posts($slug)) !== 0){
                return back()->with('delete-error', 'This category has posts!');
            }

            $this->categoryRepository->delete($slug);
            return back()->with('success', 'Category deleted');

        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }
    }
}
