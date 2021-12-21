<?php
declare(strict_types=1);

namespace Merophp\JsonViewPlugin;

use JsonException;
use Merophp\JsonViewPlugin\Serializer\JsonSerializer;
use Merophp\ViewEngine\ViewInterface;

class JsonView implements ViewInterface{

    /**
     * @var string
     */
	protected string $output;

    /**
     * @var string
     */
    protected string $contentType = 'application/json;charset=utf-8';

    /**
     * @var JsonSerializer
     */
    protected JsonSerializer $jsonSerializer;

    /**
     *
     */
    public function __construct()
    {
        $this->jsonSerializer = new JsonSerializer;
    }

    /**
     * @param JsonSerializer $jsonSerializer
     */
    public function injectJsonSerializer(JsonSerializer $jsonSerializer)
    {
        $this->jsonSerializer = $jsonSerializer;
    }

    /**
     * @return string
     */
	public function render(): string
    {
		ob_start();
        echo $this->output;
		$result=ob_get_contents();
		ob_end_clean();

		return $result;
	}

    /**
     * @param mixed $valueToJsonSerialize
     * @throws JsonException
     * @api
     */
    public function json($valueToJsonSerialize)
    {
        $this->output = JsonSerializer::serialize($valueToJsonSerialize);
	}

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }
}
