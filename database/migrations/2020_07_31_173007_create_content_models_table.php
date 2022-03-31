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
            $table->text("product_astarlove");
            $table->text("product_cge");
            $table->text("product_cdg");
            $table->text("product_blackspace");
            $table->text("product_cpw");
            $table->text("product_solitarius");
            $table->text("product_ufw");
            $table->text("product_corvuschat");
            $table->text("services_lachanfall");
            $table->text("services_geekflash");
            $table->text('services_astarlove');
            $table->text('services_gamingpals');
            $table->text("services_webframeworkdb");
            $table->text("services_mittelalterevents");
            $table->text("services_helprealm");
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
