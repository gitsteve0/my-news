<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class DatatableRequest
{
	private $request;
	public $start;
	public $page;
	public $per_page;
	public $search;

	/**
	 * DatatableRequest constructor.
	 * @param Request $request
	 */
	public function __construct(Request $request)
	{
		$this->request = $request;

		$this->start = $request->get('start', 0);
		$this->per_page = $request->get('length', 1);
		$this->search = optional($request->get('search'))['value'];
		$this->page = $this->start / $this->per_page + 1;
	}

	public function get($key)
	{
		return $this->request->get($key);
	}


    public function jsonResponse($total, $data)
    {
        return response()->json([
            'draw' => $this->get('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $data
        ]);
    }
}
