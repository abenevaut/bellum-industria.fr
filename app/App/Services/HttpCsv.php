<?php namespace abenevaut\App\Services;

class HttpCsv
{

	/**
	 * @var null Stream file descriptor
	 */
	protected $fd = null;

	/**
	 * HttpCsvService constructor.
	 */
	public function __construct($memory_limit = '256M')
	{
		// Set the memory limit
		ini_set('memory_limit', $memory_limit);

		// Stop writing to PHP buffer
		if (ob_get_length() > 0) {
			ob_end_clean();
		}
	}

	/**
	 * @param string $filename
	 */
	public function httpHeaders($filename = 'export.csv')
	{
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Description: File Transfer');
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename=$filename");
		header("Expires: 0");
		header("Pragma: public");
	}

	/**
	 * @return resource
	 */
	public function openStream()
	{
		$this->fd = fopen('php://output', 'w');
		return $this->fd;
	}

	/**
	 * @return resource
	 */
	public function closeStream()
	{
		return fclose($this->fd);
	}

	/**
	 * @param array $row
	 *
	 * @return int
	 */
	public function writeRow(array $row = [])
	{
		return fputcsv($this->fd, $row);
	}

	/**
	 * @param int $timeLimit
	 *
	 * @return bool
	 */
	public function resetTimeLimit($timeLimit = 30)
	{
		return set_time_limit($timeLimit);
	}
}
