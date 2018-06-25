<!DOCTYPE qgis PUBLIC 'http://mrcc.com/qgis.dtd' 'SYSTEM'>
<qgis simplifyDrawingHints="1" simplifyAlgorithm="0" minScale="1e+8" version="3.0.3-Girona" simplifyMaxScale="1" hasScaleBasedVisibilityFlag="0" maxScale="0" labelsEnabled="0" simplifyDrawingTol="1" readOnly="0" simplifyLocal="1">
  <renderer-v2 type="singleSymbol" enableorderby="0" symbollevels="0" forceraster="0">
    <symbols>
      <symbol clip_to_extent="1" type="fill" name="0" alpha="1">
        <layer enabled="1" locked="0" class="SimpleFill" pass="0">
          <prop k="border_width_map_unit_scale" v="3x:0,0,0,0,0,0"/>
          <prop k="color" v="59,195,122,255"/>
          <prop k="joinstyle" v="bevel"/>
          <prop k="offset" v="0,0"/>
          <prop k="offset_map_unit_scale" v="3x:0,0,0,0,0,0"/>
          <prop k="offset_unit" v="MM"/>
          <prop k="outline_color" v="35,35,35,255"/>
          <prop k="outline_style" v="solid"/>
          <prop k="outline_width" v="0.26"/>
          <prop k="outline_width_unit" v="MM"/>
          <prop k="style" v="solid"/>
          <data_defined_properties>
            <Option type="Map">
              <Option type="QString" name="name" value=""/>
              <Option name="properties"/>
              <Option type="QString" name="type" value="collection"/>
            </Option>
          </data_defined_properties>
        </layer>
      </symbol>
    </symbols>
    <rotation/>
    <sizescale/>
  </renderer-v2>
  <customproperties>
    <property key="embeddedWidgets/count" value="0"/>
    <property key="variableNames"/>
    <property key="variableValues"/>
  </customproperties>
  <blendMode>0</blendMode>
  <featureBlendMode>0</featureBlendMode>
  <layerOpacity>1</layerOpacity>
  <SingleCategoryDiagramRenderer diagramType="Histogram" attributeLegend="1">
    <DiagramCategory labelPlacementMethod="XHeight" penAlpha="255" minimumSize="0" barWidth="5" scaleBasedVisibility="0" backgroundColor="#ffffff" sizeType="MM" minScaleDenominator="0" backgroundAlpha="255" maxScaleDenominator="1e+8" scaleDependency="Area" lineSizeType="MM" sizeScale="3x:0,0,0,0,0,0" height="15" opacity="1" diagramOrientation="Up" penColor="#000000" width="15" rotationOffset="270" enabled="0" penWidth="0" lineSizeScale="3x:0,0,0,0,0,0">
      <fontProperties style="" description="Gulim,9,-1,5,50,0,0,0,0,0"/>
    </DiagramCategory>
  </SingleCategoryDiagramRenderer>
  <DiagramLayerSettings priority="0" dist="0" placement="0" zIndex="0" obstacle="0" linePlacementFlags="18" showAll="1">
    <properties>
      <Option type="Map">
        <Option type="QString" name="name" value=""/>
        <Option name="properties"/>
        <Option type="QString" name="type" value="collection"/>
      </Option>
    </properties>
  </DiagramLayerSettings>
  <fieldConfiguration>
    <field name="Name">
      <editWidget type="TextEdit">
        <config>
          <Option/>
        </config>
      </editWidget>
    </field>
    <field name="Description">
      <editWidget type="TextEdit">
        <config>
          <Option/>
        </config>
      </editWidget>
    </field>
  </fieldConfiguration>
  <aliases>
    <alias name="" field="Name" index="0"/>
    <alias name="" field="Description" index="1"/>
  </aliases>
  <excludeAttributesWMS/>
  <excludeAttributesWFS/>
  <defaults>
    <default applyOnUpdate="0" expression="" field="Name"/>
    <default applyOnUpdate="0" expression="" field="Description"/>
  </defaults>
  <constraints>
    <constraint constraints="0" exp_strength="0" notnull_strength="0" unique_strength="0" field="Name"/>
    <constraint constraints="0" exp_strength="0" notnull_strength="0" unique_strength="0" field="Description"/>
  </constraints>
  <constraintExpressions>
    <constraint exp="" field="Name" desc=""/>
    <constraint exp="" field="Description" desc=""/>
  </constraintExpressions>
  <attributeactions>
    <defaultAction key="Canvas" value="{00000000-0000-0000-0000-000000000000}"/>
  </attributeactions>
  <attributetableconfig actionWidgetStyle="dropDown" sortExpression="" sortOrder="0">
    <columns>
      <column type="field" width="-1" name="Name" hidden="0"/>
      <column type="field" width="-1" name="Description" hidden="0"/>
      <column type="actions" width="-1" hidden="1"/>
    </columns>
  </attributetableconfig>
  <editform></editform>
  <editforminit/>
  <editforminitcodesource>0</editforminitcodesource>
  <editforminitfilepath></editforminitfilepath>
  <editforminitcode><![CDATA[# -*- coding: utf-8 -*-
"""
QGIS 양식은 양식이 열릴 때 호출된 파이썬 함수를 보유할 수 있습니다.

이 함수를 사용해서 사용자 양식에 추가 로직을 추가하십시오.

"파이썬 초기 함수" 란에 함수명을 입력하십시오.
다음은 그 예시입니다:
"""
from qgis.PyQt.QtWidgets import QWidget

def my_form_open(dialog, layer, feature):
	geom = feature.geometry()
	control = dialog.findChild(QWidget, "MyLineEdit")
]]></editforminitcode>
  <featformsuppress>0</featformsuppress>
  <editorlayout>generatedlayout</editorlayout>
  <editable>
    <field editable="1" name="Description"/>
    <field editable="1" name="Name"/>
  </editable>
  <labelOnTop>
    <field name="Description" labelOnTop="0"/>
    <field name="Name" labelOnTop="0"/>
  </labelOnTop>
  <widgets/>
  <conditionalstyles>
    <rowstyles/>
    <fieldstyles/>
  </conditionalstyles>
  <expressionfields/>
  <previewExpression>Name</previewExpression>
  <mapTip></mapTip>
  <layerGeometryType>2</layerGeometryType>
</qgis>
