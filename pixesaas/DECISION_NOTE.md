# PixeSaaS Theme – Coded vs. Elementor Decision

## Final Recommendation: Keep All Sections Coded with ACF

After actually building the CTA section in Elementor V4 and comparing that experience with the coded ACF approach, I think keeping the sections coded with ACF is the better choice for this project.

The coded version was much quicker to build and gave more control over the final layout. Elementor was supposed to provide an easier visual workflow, but during implementation I found that the new Div/Grid system still required understanding CSS concepts like Flexbox and Grid.

## Why?

* **Faster development:** The CTA took around 15 minutes to build using the coded approach, while building it in Elementor took approximately 45–60 minutes.
* **Better structure:** ACF provides guided fields, which makes it easier for editors to update content without accidentally changing or breaking the design.
* **Better performance:** The coded PHP/CSS approach avoids the extra builder overhead that comes with Elementor.
* **Version control:** The ACF field definitions and templates can be stored and tracked in Git.
* **Design consistency:** Fixed templates help maintain the original Figma design and spacing.
* **Better for dynamic content:** Sections like Features, Stats, Pricing, and Blog already follow structured content patterns, which work well with ACF.

## Section Decision

| Section  | Recommendation    |
| -------- | ----------------- |
| Hero     | ACF / Coded       |
| Features | ACF / Coded       |
| Stats    | ACF / Coded       |
| Pricing  | ACF / Coded       |
| Blog     | Coded Query + ACF |
| CTA      | ACF / Coded       |

## Elementor V4 Issues Experienced

While implementing the CTA section in Elementor, I experienced a few issues that made the workflow slower than expected:

* The new Div/Grid system was more complex than the older Section/Column approach.
* Some widgets were unavailable or difficult to use.
* Responsive editing sometimes caused layout problems while switching between views.
* Publishing occasionally required troubleshooting.
* Building the layout still required knowledge of CSS concepts such as Flexbox and Grid.
* Reusing templates involved additional steps.

## Conclusion

For PixeSaaS, I would keep all sections coded using PHP, CSS, and ACF.

Based on the actual implementation experience, this approach was faster, gave better control over the design, was easier to version-control, and provided a safer editing experience for non-technical content editors.

If future projects require more visual editing flexibility, Gutenberg blocks could be a better alternative to Elementor V4.

