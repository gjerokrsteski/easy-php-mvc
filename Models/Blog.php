<?php
/**
 * Class for data access
 */
class Models_Blog
{
  /**
   * @var array
   */
  private static $entries = array(
    array(
      "id"     => 0,
      "title"  => "Entry 1",
      "content"=> "I'm the first entry."
    ),
    array(
      "id"     => 1,
      "title"  => "Entry 2",
      "content"=> "I'm the second entry!"
    ),
    array(
      "id"     => 2,
      "title"  => "Entry 3",
      "content"=> "Well I'm number three... he he he"
    )
  );

  /**
   * Returns all the entries of the blog.
   *
   * @return array Array of blog entries.
   */
  public static function getEntries()
  {
    return self::$entries;
  }

  /**
   * Returns a specific entry.
   *
   * @param int $id Id of the entry.
   * @return array Array that represents an entry, or if this is not present, 0.
   */
  public static function getEntry($id)
  {
    if (array_key_exists($id, self::$entries)) {
      return self::$entries[$id];
    }

    return null;
  }
}
