<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_models', function (Blueprint $table) {
            $table->id();
            $table->string('lang', 10)->default('en');
            $table->text("home_index");
            $table->text("home_tech");
            $table->text("home_imprint");
            $table->text("product_dnyscript");
            $table->text("product_asatruphp");
            $table->text("product_danigram");
            $table->text("product_actifisys");
            $table->text("product_cdg");
            $table->text("services_helprealm");
            $table->text("services_lachanfall");
            $table->text('services_gamingpals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_models');
    }
}
