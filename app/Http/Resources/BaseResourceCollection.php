<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class BaseResourceCollection extends ResourceCollection
{
	protected $status;
	protected $message;
    protected $meta;
    
	public function __construct(
	    $resource,
        int $status = 200,
        ?string $message = null,
        array $meta = []
    ) {
		parent::__construct($resource);
		$this->status = $status;
		$this->message = $message ?? '';
		$this->meta = $meta;
	}

	public function withResponse($request, $response)
    {
		$response->setStatusCode($this->status);
	}

	public function with($request)
    {
		$success = ((int)($this->status/100)) === 2;
		$message = $this->message;
		$meta = $this->meta;
		return compact('success', 'message', 'meta');
	}
}
