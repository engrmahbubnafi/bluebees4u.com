<?php
/**
 *
 */
namespace App\Abilities;

use Illuminate\Support\Str;

class Link
{
    public static function show($url, $tooltip = 'Details', array $classList = [])
    {
        if (count($classList)) {
            $text = $tooltip;
        } else {
            $text = '';
            $classList = ['btn', 'btn-sm', 'btn-clean', 'btn-icon'];
        }
        return '<a class="' . implode(" ", $classList) . '" href=' . $url . ' target="_blank">
            <i class="la la-eye text-info" data-tooltip="' . $tooltip . '"></i> ' . $text . '
        </a>';
    }

    public static function anchor($url, $text, $tooltip = '', array $classList = [])
    {
        return '<a class="' . implode(" ", $classList) . '" data-tooltip="' . $tooltip . '" href=' . $url . ' target="_blank">' . $text . '</a>';
    }

    public static function edit($url, $tooltip = 'Edit', array $classList = [])
    {
        if (count($classList)) {
            $text = $tooltip;
        } else {
            $text = '';
            $classList = ['btn', 'btn-sm', 'btn-clean', 'btn-icon'];
        }

        return '<a class="' . implode(" ", $classList) . '" href=' . $url . '>
            <i class="la la-edit text-warning" data-tooltip="' . $tooltip . '"></i> &nbsp;' . $text . '
        </a>';
    }

    public static function delete($url, $message = 'Are you sure to delete?', array $classList = [])
    {

        if (count($classList)) {
            $text = 'Delete';
            $buttonClassList = ['p-0 border-0 bg-white'];
        } else {
            $buttonClassList = ['btn', 'btn-sm', 'btn-clean', 'btn-icon'];
            $classList = ['d-inline '];
            $text = '';
        }

        return '<form class="' . implode(" ", $classList) . '" method="POST" action="' . $url . '" accept-charset="UTF-8" onsubmit="return window.confirm(\'' . $message . '\')">
            <input name="_method" type="hidden" value="DELETE">
            <input name="_token" type="hidden" value="' . csrf_token() . '">
            <button type="submit" class="' . implode(" ", $buttonClassList) . '">
                <i class="la la-trash text-danger" data-tooltip="Delete"></i> ' . $text . '
            </button>
        </form>';
    }

    public static function userWithCountry($url, $user_code, $country_id, $tooltip = null, $userIdForChatIcon = null)
    {
        $chatBtn = null;
        if ($userIdForChatIcon) {
            $chatBtn = view()->make("components.communication-comp-head")
                ->with("id", $userIdForChatIcon)
                ->render();
        }

        return '<div class="d-flex justify-content-between align-items-center">
            <a href="' . $url . '" target="_blank">
                <span class="d-flex">
                    <i class="flag-icon flag-icon-' . strtolower($country_id) . '" data-tooltip="' . $tooltip . '"></i>
                    &nbsp;' . $user_code . '
                </span>
            </a>' . $chatBtn . '
        </div>';
    }

    public static function passwordChange($url, $tooltip = 'Change Password', array $classList = [])
    {
        if (count($classList)) {
            $text = $tooltip;
        } else {
            $text = '';
            $classList = ['btn', 'btn-sm', 'btn-clean', 'btn-icon'];
        }

        return '<a class="' . implode(" ", $classList) . '" href=' . $url . '>
            <i class="la la-key la-lg" data-tooltip="' . $tooltip . '"></i> &nbsp;' . $text . '
        </a>';
    }

    public static function selectOption($options, $name = null, $id = null, $class = null, $selectedValue = null, $onChangeFuntion = null)
    {
        $selectOption = "<select name='" . $name . "' id='" . $id . "' class='" . $class . "' onchange='" . $onChangeFuntion . "' >";

        foreach ($options as $key => $value) {

            $selectOption .= "<option " . (($selectedValue == $key) ? ' selected' : '') . " value='" . $key . "'>" . $value . "</option>";
        }
        $selectOption .= "</select>";

        return $selectOption;

    }

    /**
     * Nafi: The plan is to make a switch to use in all future projects with this class. Currently, the work is incomplete, so, commenting for now.
     */
    /**
     * Make a switch.
     *
     * @param boolean $value If the switch is on or off.
     *
     * @return string
     */
    function switch ($value): string {
            if ($value == 1) {
                // Return switch off state.
                return '<div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="" id="flexSwitchDefault"/>
                        </div>';
            } elseif ($value == 0) {
                // Return switch on state.
                return '<div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="" id="flexSwitchChecked" checked="checked" />
                        </div>';
            }
    }

    /**
     * Make a modal.
     *
     * @param int $dataId
     * @param string $targetId
     * @param string $icon
     * @param string $tooltip
     * @return string
     */
    public static function modal(int $dataId, string $targetId, string $icon, string $tooltip = null, array $classList = [], $attr = ""): string
    {
        if (count($classList)) {
            $text = $tooltip;
        } else {
            $text = '';
            $classList = ['btn', 'btn-sm', 'btn-clean', 'btn-icon'];
        }

        return '<a class="' . implode(" ", $classList) . '" data-id="' . $dataId . '" data-bs-toggle="modal" data-bs-target="' . $targetId . '" ' . $attr . '><i class="' . $icon . '" data-tooltip="' . $tooltip . '"></i> &nbsp;' . $text . '</a>';
    }

    /**
     * Make a custom link.
     *
     * @param string $url
     * @param string $icon
     * @param string $tooltip
     *
     * @return string
     */
    public static function customLink($url, $icon = "la la-edit text-warning", $tooltip = null, array $classList = [])
    {
        if (count($classList)) {
            $text = $tooltip;
        } else {
            $text = '';
            $classList = ['btn', 'btn-sm', 'btn-clean', 'btn-icon'];
        }

        return '<a class="' . implode(" ", $classList) . '" href=' . $url . '>
            <i class="' . $icon . '" data-tooltip="' . $tooltip . '"></i> &nbsp;' . $text . '
        </a>';
    }

    /**
     * Generate the link(s) created.
     */
    public static function generate(...$links)
    {
        return "<div class='d-flex align-items-center justify-content-center'>
            " . implode(' ', $links) . "
        </div>";
    }

    public static function generateDropdown(...$links)
    {
        return '<a
            href="javascript:void(0)"
            class="btn btn-light btn-active-light-primary btn-sm"
            data-kt-menu-trigger="click"
            data-kt-menu-placement="bottom-end"
            >Actions
            <span class="svg-icon svg-icon-5 m-0">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
            >
                <path
                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                fill="currentColor"
                />
            </svg>
            </span>
        </a>
        <div
            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
            data-kt-menu="true"
        >'
        . Str::wrapImplode($links, '<div class="menu-item px-3">', '</div>') .
            '</div>';

    }

}
