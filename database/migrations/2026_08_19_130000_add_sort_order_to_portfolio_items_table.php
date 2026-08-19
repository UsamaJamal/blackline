<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PortfolioItem;

class AddSortOrderToPortfolioItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->integer('sort_order')->default(0)->after('category');
        });

        // Give existing rows a distinct, sequential order (oldest first).
        $i = 1;
        foreach (PortfolioItem::orderBy('created_at')->get() as $item) {
            $item->sort_order = $i++;
            $item->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
}
