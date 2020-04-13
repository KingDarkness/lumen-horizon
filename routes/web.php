<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    // Dashboard Routes...
    Route::get('/stats', 'DashboardStatsController@index', ['as' => 'horizon.stats.index']);

    // Workload Routes...
    Route::get('/workload', 'WorkloadController@index', ['as' => 'horizon.workload.index']);

    // Master Supervisor Routes...
    Route::get('/masters', 'MasterSupervisorController@index', ['as' => 'horizon.masters.index']);

    // Monitoring Routes...
    Route::get('/monitoring', 'MonitoringController@index', ['as' => 'horizon.monitoring.index']);
    Route::post('/monitoring', 'MonitoringController@store', ['as' => 'horizon.monitoring.store']);
    Route::get('/monitoring/{tag}', 'MonitoringController@paginate', ['as' => 'horizon.monitoring-tag.paginate']);
    Route::delete('/monitoring/{tag}', 'MonitoringController@destroy', ['as' => 'horizon.monitoring-tag.destroy']);

    // Job Metric Routes...
    Route::get('/metrics/jobs', 'JobMetricsController@index', ['as' => 'horizon.jobs-metrics.index']);
    Route::get('/metrics/jobs/{id}', 'JobMetricsController@show', ['as' => 'horizon.jobs-metrics.show']);

    // Queue Metric Routes...
    Route::get('/metrics/queues', 'QueueMetricsController@index', ['as' => 'horizon.queues-metrics.index']);
    Route::get('/metrics/queues/{id}', 'QueueMetricsController@show', ['as' => 'horizon.queues-metrics.show']);

    // Job Routes...
    Route::get('/jobs/recent', 'RecentJobsController@index', ['as' => 'horizon.recent-jobs.index']);
    Route::get('/jobs/recent/{id}', 'RecentJobsController@show', ['as' => 'horizon.recent-jobs.show']);
    Route::get('/jobs/failed', 'FailedJobsController@index', ['as' => 'horizon.failed-jobs.index']);
    Route::get('/jobs/failed/{id}', 'FailedJobsController@show', ['as' => 'horizon.failed-jobs.show']);
    Route::post('/jobs/retry/{id}', 'RetryController@store', ['as' => 'horizon.retry-jobs.show']);
});
