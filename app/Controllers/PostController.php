<?php

namespace App\Controllers;

class PostController
{
    public function index()
    {
        // استرجاع جميع المقالات
        echo json_encode(['message' => 'Retrieving all posts']);
    }

    public function show($id)
    {
        // استرجاع مقال واحد بناءً على ID
        echo json_encode(['message' => 'Displaying post with ID: ' . $id]);
    }

    public function store()
    {
        // إضافة مقال جديد
        echo json_encode(['message' => 'Creating a new post']);
    }

    public function update($id)
    {
        // تحديث مقال موجود
        echo json_encode(['message' => 'Updating post with ID: ' . $id]);
    }

    public function delete($id)
    {
        // حذف مقال
        echo json_encode(['message' => 'Deleting post with ID: ' . $id]);
    }
    public function users()
    {
        // حذف مقال
        echo json_encode(['message' => 'users ']);
    }
    
}
