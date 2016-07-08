<?php namespace Core\Paginations;

use Illuminate\Pagination\BootstrapThreePresenter;

class AdminltePagination extends BootstrapThreePresenter
{
    /**
     * Render Bootstrap (adminlte) pagination
     *
     * @return string
     */
    public function render()
    {
        if (!$this->hasPages()) {
            return '';
        }

        return sprintf(
            '<ul class="pagination pagination-sm no-margin pull-right" aria-label="Pagination">%s %s %s</ul></div>',
            $this->getPreviousButton(),
            $this->getLinks(),
            $this->getNextButton()
        );
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string $text
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
        return '';
        // return '<li class="disabled" aria-disabled="true"><a href="javascript:void(0)">' . $text . '</a></li>';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<li class="active"><a href="javascript:void(0)">' . $text . '</a></li>';
    }
}