<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    private array $settingKeys = [
        // ── Homepage ──────────────────────────────────────────────
        'site_hero_eyebrow', 'site_hero_title', 'site_hero_body',
        'home_stat_1_num', 'home_stat_1_label',
        'home_stat_2_num', 'home_stat_2_label',
        'home_stat_3_num', 'home_stat_3_label',
        'home_stat_4_num', 'home_stat_4_label',
        'home_stat_5_num', 'home_stat_5_label',
        'home_pillar_1_icon', 'home_pillar_1_title', 'home_pillar_1_body', 'home_pillar_1_tag',
        'home_pillar_2_icon', 'home_pillar_2_title', 'home_pillar_2_body', 'home_pillar_2_tag',
        'home_pillar_3_icon', 'home_pillar_3_title', 'home_pillar_3_body', 'home_pillar_3_tag',
        'home_why_chip', 'home_why_heading', 'home_why_body', 'home_why_stat',
        'home_cta_heading', 'home_cta_body',
        'site_ann_1', 'site_ann_2', 'site_ann_3',

        // ── About Page ────────────────────────────────────────────
        'about_hero_title', 'about_hero_sub',
        'about_vision_heading', 'about_vision_body1', 'about_vision_body2',
        'about_partner_1_name', 'about_partner_1_role', 'about_partner_1_desc',
        'about_partner_2_name', 'about_partner_2_role', 'about_partner_2_desc',
        'about_partner_3_name', 'about_partner_3_role', 'about_partner_3_desc',
        'about_cta_heading', 'about_cta_body',

        // ── What We Do Page ───────────────────────────────────────
        'wwd_hero_title', 'wwd_hero_sub',
        'wwd_stream_1_icon', 'wwd_stream_1_title', 'wwd_stream_1_body', 'wwd_stream_1_payout',
        'wwd_stream_2_icon', 'wwd_stream_2_title', 'wwd_stream_2_body', 'wwd_stream_2_payout',
        'wwd_stream_3_icon', 'wwd_stream_3_title', 'wwd_stream_3_body', 'wwd_stream_3_payout',
        'wwd_process_heading', 'wwd_process_sub',

        // ── Tiers Page ────────────────────────────────────────────
        'tiers_hero_title', 'tiers_hero_sub',
        'tiers_section_heading', 'tiers_section_sub',
    ];

    // Image setting keys that store file paths in storage/app/public/hero-images/
    private array $imageKeys = [
        'hero_home_slide_1', 'hero_home_slide_2', 'hero_home_slide_3',
        'hero_home_slide_4', 'hero_home_slide_5',
        'hero_about', 'hero_wwd', 'hero_tiers', 'hero_invest',
        'about_vision_image',
    ];

    public function show()
    {
        $settings = Setting::all_keyed();
        return view('admin.cms', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_home_slide_1' => 'nullable|image|max:4096',
            'hero_home_slide_2' => 'nullable|image|max:4096',
            'hero_home_slide_3' => 'nullable|image|max:4096',
            'hero_home_slide_4' => 'nullable|image|max:4096',
            'hero_home_slide_5' => 'nullable|image|max:4096',
            'hero_about'        => 'nullable|image|max:4096',
            'hero_wwd'          => 'nullable|image|max:4096',
            'hero_tiers'        => 'nullable|image|max:4096',
            'hero_invest'       => 'nullable|image|max:4096',
            'about_vision_image'=> 'nullable|image|max:4096',
        ]);

        foreach ($this->settingKeys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        // Handle image uploads
        foreach ($this->imageKeys as $key) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('hero-images', 'public');
                Setting::set($key, $path);
            }
        }

        return back()->with('success', 'Content saved successfully.');
    }
}
