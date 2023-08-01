<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $setting = $this->findSetting('site.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.title'),
                'value'        => __('voyager::seeders.settings.site.title'),
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.description'),
                'value'        => __('voyager::seeders.settings.site.description'),
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.logo');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.logo'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.google_analytics_tracking_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.google_analytics_tracking_id'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 4,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('admin.bg_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.background_image'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 5,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.title'),
                'value'        => 'Voyager',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.description'),
                'value'        => __('voyager::seeders.settings.admin.description_value'),
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.loader');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.loader'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.icon_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.icon_image'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 4,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.google_analytics_client_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.google_analytics_client_id'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('social.reddit');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'reddit',
                'value'        => 'https://www.reddit.com/findjob',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Social',
            ])->save();
        }

        $setting = $this->findSetting('social.discord');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'discord',
                'value'        => 'https://www.discord.com/findjob',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Social',
            ])->save();
        }

        $setting = $this->findSetting('social.telegram');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'telegram',
                'value'        => 'https://www.telegram.com/findjob',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Social',
            ])->save();
        }

        $setting = $this->findSetting('social.twitter');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'twitter',
                'value'        => 'https://www.twitter.com/findjob',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Social',
            ])->save();
        }

        $setting = $this->findSetting('home.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'home title',
                'value'        => 'Life is too short...',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Home',
            ])->save();
        }

        $setting = $this->findSetting('home.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'home description',
                'value'        => 'Find the job you enjoy',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Home',
            ])->save();
        }

        $setting = $this->findSetting('promote.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'promote description',
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Promote',
            ])->save();
        }

        $setting = $this->findSetting('promote.price1');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'plan one price',
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Promote',
            ])->save();
        }

        $setting = $this->findSetting('promote.price2');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'plan two price',
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Promote',
            ])->save();
        }

        $setting = $this->findSetting('site.accept');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'accept message (employer request page)',
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 4,
                'group'        => 'Site',
            ])->save();
        }

    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
