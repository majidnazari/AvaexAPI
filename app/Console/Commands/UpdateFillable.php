<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateFillable extends Command
{
    protected $signature = 'model:update-fillable {model}';
    protected $description = 'Update the $fillable property of a model with all columns from the database table';

    public function handle()
    {
        $modelClass = $this->argument('model');
        $model = 'App\\Models\\' . $modelClass;

        if (!class_exists($model)) {
            $this->error("Model $modelClass does not exist.");
            return 1;
        }

        // Get the table name from the model
        $table = (new $model)->getTable();

        // Fetch all column names from the database table
        $columns = DB::getSchemaBuilder()->getColumnListing($table);

        // Generate the fillable array
        $fillableArray = array_map(function ($column) {
            return "'$column'";
        }, $columns);

        $fillableString = implode(', ', $fillableArray);

        // Update the model file
        $modelPath = app_path("Models/$modelClass.php");
        $content = file_get_contents($modelPath);

        if (preg_match('/protected \$fillable\s*=\s*\[.*?\];/s', $content, $matches)) {
            $newContent = preg_replace('/protected \$fillable\s*=\s*\[.*?\];/s', "protected \$fillable = [$fillableString];", $content);
        } else {
            $newContent = str_replace(
                'class ' . $modelClass,
                "class $modelClass\n{\n    protected \$fillable = [$fillableString];",
                $content
            );
        }

        file_put_contents($modelPath, $newContent);
        $this->info("Model $modelClass updated successfully.");
        return 0;
    }
}
