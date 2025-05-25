<?php

use App\Models\ServiceCategory;

if (!function_exists('getServiceCategories')) {

    /**
     * Get active service categories
     *
     * @param
     * @return
     */
    function getServiceCategories()
    {
        return ServiceCategory::withCount('services')->where('status', 1)->get();
    }
}
