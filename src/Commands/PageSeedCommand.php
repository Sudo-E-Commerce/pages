<?php

namespace Sudo\Page\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use DB;

class PageSeedCommand extends Command {

    protected $signature = 'sudo/pages:seeds';

    protected $description = 'Khởi tạo dữ liệu mẫu cho Trang đơn';

    public function handle() {
        DB::table('pages')->truncate();
        DB::table('seos')->where('type', 'pages')->delete();
        DB::table('system_logs')->where('type', 'pages')->delete();
    	DB::table('language_metas')->where('lang_table', 'pages')->delete();
        $created_at = $updated_at = date('Y-m-d H:i:s');
        $detail = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis tempora pariatur est ipsam nisi saepe maxime quisquam soluta atque beatae rerum illum incidunt, aut harum unde, facilis nobis, consectetur. Inventore.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis tempora pariatur est ipsam nisi saepe maxime quisquam soluta atque beatae rerum illum incidunt, aut harum unde, facilis nobis, consectetur. Inventore.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis tempora pariatur est ipsam nisi saepe maxime quisquam soluta atque beatae rerum illum incidunt, aut harum unde, facilis nobis, consectetur. Inventore.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis tempora pariatur est ipsam nisi saepe maxime quisquam soluta atque beatae rerum illum incidunt, aut harum unde, facilis nobis, consectetur. Inventore.</p><ul><li><a href="#">Link</a></li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis tempora pariatur est ipsam nisi saepe maxime quisquam soluta atque beatae rerum illum incidunt, aut harum unde, facilis nobis, consectetur. Inventore.</li><li><a href="#">Link</a></li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis tempora pariatur est ipsam nisi saepe maxime quisquam soluta atque beatae rerum illum incidunt, aut harum unde, facilis nobis, consectetur. Inventore.</li></ul><table><thead><tr><th>Column 1</th><th>Column 2</th><th>Column 3</th></tr></thead><tbody><tr><td>data</td><td>data</td><td>data</td></tr><tr><td>data</td><td>data</td><td>data</td></tr><tr><td>data</td><td>data</td><td>data</td></tr></tbody></table>';

        $stt = 0;
        for ($j=0; $j < 10; $j++) {
            $pages = [];
            $seos = [];
            $lang_metas = [];
            for ($i=0; $i < 1000; $i++) {
                $stt++;
                $name = 'Trang đơn '.$stt;
                $pages[] = [
                    'name' => $name,
                    'slug' => str_slug($name),
                    'detail' => $detail,
                    'status' => 1,
                    'created_at' => $created_at,
                    'updated_at' => $updated_at,
                ];
                $seos[] = [
                    'type'              => 'pages',
                    'type_id'           => $stt,
                    'title'             => '',
                    'description'       => '',
                    'robots'            => 'Index,Follow',
                ];
                $lang_metas[] = [
                    'lang_table'        => 'pages',
                    'lang_table_id'     => $stt,
                    'lang_locale'       => 'vi',
                    'lang_code'         => getCodeLangMeta()
                ];
            }
            DB::table('pages')->insert($pages);
            DB::table('seos')->insert($seos);
            DB::table('language_metas')->insert($lang_metas);
        }
        $this->echoLog('Trang don duoc tao thanh cong. So luong: '.$stt);
    }

    public function echoLog($string) {
        $this->info($string);
        Log::info($string);
    }

}