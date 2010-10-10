<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

  /**
   * The desired width of the CAPTCHA image.
   *
   * @var int
   */
$securimage['image_width'] = 100;

  /**
   * The desired width of the CAPTCHA image.
   *
   * @var int
   */
$securimage['image_height'] = 25;

  /**
   * The image format for output.<br />
   * Valid options: SI_IMAGE_PNG, SI_IMAGE_JPEG, SI_IMAGE_GIF
   *
   * @var string
   */
$securimage['image_type'] = 'SI_IMAGE_GIF';

  /**
   * The length of the code to generate.
   *
   * @var int
   */
$securimage['code_length'] = 3;

  /**
   * The character set for individual characters in the image.<br />
   * Letters are converted to uppercase.<br />
   * The font must support the letters or there may be problematic substitutions.
   *
   * @var string
   */
$securimage['charset'] = 'ABCDEFGHKLMNPRSTUVWYZ23456789';
  //var $charset = '0123456789';

  /**
   * Create codes using this word list
   *
   * @var string  The path to the word list to use for creating CAPTCHA codes
   */
$securimage['wordlist_file'] = APPPATH.'words/words.txt';

  /**
   * True to use a word list file instead of a random code
   *
   * @var bool
   */
$securimage['use_wordlist']  = true;

  /**
   * Whether to use a GD font instead of a TTF font.<br />
   * TTF offers more support and options, but use this if your PHP doesn't support TTF.<br />
   *
   * @var boolean
   */
$securimage['use_gd_font'] = false;

  /**
   * The GD font to use.<br />
   * Internal gd fonts can be loaded by their number.<br />
   * Alternatively, a file path can be given and the font will be loaded from file.
   *
   * @var mixed
   */
$securimage['gd_font_file'] = APPPATH.'views/fonts/gdfonts/bubblebath.gdf';

  /**
   * The approximate size of the font in pixels.<br />
   * This does not control the size of the font because that is determined by the GD font itself.<br />
   * This is used to aid the calculations of positioning used by this class.<br />
   *
   * @var int
   */
$securimage['gd_font_size'] = 120;

  // Note: These font options below do not apply if you set $use_gd_font to true with the exception of $text_color

  /**
   * The path to the TTF font file to load.
   *
   * @var string
   */
$securimage['ttf_file'] = APPPATH.'../system/fonts/elephant.ttf';

  /**
   * The font size.<br />
   * Depending on your version of GD, this should be specified as the pixel size (GD1) or point size (GD2)<br />
   *
   * @var int
   */
$securimage['font_size'] = 13;

  /**
   * The minimum angle in degrees, with 0 degrees being left-to-right reading text.<br />
   * Higher values represent a counter-clockwise rotation.<br />
   * For example, a value of 90 would result in bottom-to-top reading text.
   *
   * @var int
   */
$securimage['text_angle_minimum'] = -20;

  /**
   * The minimum angle in degrees, with 0 degrees being left-to-right reading text.<br />
   * Higher values represent a counter-clockwise rotation.<br />
   * For example, a value of 90 would result in bottom-to-top reading text.
   *
   * @var int
   */
$securimage['text_angle_maximum'] = 20;

  /**
   * The X-Position on the image where letter drawing will begin.<br />
   * This value is in pixels from the left side of the image.
   *
   * @var int
   */
$securimage['text_x_start'] = 8;

  /**
   * Letters can be spaced apart at random distances.<br />
   * This is the minimum distance between two letters.<br />
   * This should be <i>at least</i> as wide as a font character.<br />
   * Small values can cause letters to be drawn over eachother.<br />
   *
   * @var int
   */
$securimage['text_minimum_distance'] = 30;

  /**
   * Letters can be spaced apart at random distances.<br />
   * This is the maximum distance between two letters.<br />
   * This should be <i>at least</i> as wide as a font character.<br />
   * Small values can cause letters to be drawn over eachother.<br />
   *
   * @var int
   */
$securimage['text_maximum_distance'] = 33;

  /**
   * The background color for the image.<br />
   * This should be specified in HTML hex format.<br />
   * Make sure to include the preceding # sign!
   *
   * @var string
   */
$securimage['image_bg_color'] = "#e3daed";

  /**
   * The text color to use for drawing characters.<br />
   * This value is ignored if $use_multi_text is set to true.<br />
   * Make sure this contrasts well with the background color.<br />
   * Specify the color in HTML hex format with preceding # sign
   *
   * @see Securimage::$use_multi_text
   * @var string
   */
$securimage['text_color'] = "#ff0000";

  /**
   * Set to true to use multiple colors for each character.
   *
   * @see Securimage::$multi_text_color
   * @var boolean
   */
$securimage['use_multi_text'] = true;

  /**
   * String of HTML hex colors to use.<br />
   * Separate each possible color with commas.<br />
   * Be sure to precede each value with the # sign.
   *
   * @var string
   */
$securimage['multi_text_color'] = "#0a68dd,#f65c47,#8d32fd";

  /**
   * Set to true to make the characters appear transparent.
   *
   * @see Securimage::$text_transparency_percentage
   * @var boolean
   */
$securimage['use_transparent_text'] = true;

  /**
   * The percentage of transparency, 0 to 100.<br />
   * A value of 0 is completely opaque, 100 is completely transparent (invisble)
   *
   * @see Securimage::$use_transparent_text
   * @var int
   */
$securimage['text_transparency_percentage'] = 15;


  // Line options
  /**
   * Draw vertical and horizontal lines on the image.
   *
   * @see Securimage::$line_color
   * @see Securimage::$line_distance
   * @see Securimage::$line_thickness
   * @see Securimage::$draw_lines_over_text
   * @var boolean
   */
$securimage['draw_lines'] = true;

  /**
   * The color of the lines drawn on the image.<br />
   * Use HTML hex format with preceding # sign.
   *
   * @see Securimage::$draw_lines
   * @var string
   */
$securimage['line_color'] = "#80BFFF";

  /**
   * How far apart to space the lines from eachother in pixels.
   *
   * @see Securimage::$draw_lines
   * @var int
   */
$securimage['line_distance'] = 5;

  /**
   * How thick to draw the lines in pixels.<br />
   * 1-3 is ideal depending on distance
   *
   * @see Securimage::$draw_lines
   * @see Securimage::$line_distance
   * @var int
   */
$securimage['line_thickness'] = 1;

  /**
   * Set to true to draw angled lines on the image in addition to the horizontal and vertical lines.
   *
   * @see Securimage::$draw_lines
   * @var boolean
   */
$securimage['draw_angled_lines'] = false;

  /**
   * Draw the lines over the text.<br />
   * If fales lines will be drawn before putting the text on the image.<br />
   * This can make the image hard for humans to read depending on the line thickness and distance.
   *
   * @var boolean
   */
$securimage['draw_lines_over_text'] = false;

  /**
   * For added security, it is a good idea to draw arced lines over the letters to make it harder for bots to segment the letters.<br />
   * Two arced lines will be drawn over the text on each side of the image.<br />
   * This is currently expirimental and may be off in certain configurations.
   *
   * @var boolean
   */
$securimage['arc_linethrough'] = true;

  /**
   * The colors or color of the arced lines.<br />
   * Use HTML hex notation with preceding # sign, and separate each value with a comma.<br />
   * This should be similar to your font color for single color images.
   *
   * @var string
   */
$securimage['arc_line_colors'] = "#8080ff";

  /**
   * Full path to the WAV files to use to make the audio files, include trailing /.<br />
   * Name Files  [A-Z0-9].wav
   *
   * @since 1.0.1
   * @var string
   */
$securimage['audio_path'] = APPPATH.'audio/';

/* End of file securimage.php */
/* Location: ./system/application/config/securimage.php */